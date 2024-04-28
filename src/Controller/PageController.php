<?php

namespace App\Controller;
use App\Entity\Posts;
use App\Form\PostsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\ORM\EntityManagerInterface;


class PageController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(EntityManagerInterface $entityManager, Request $request): Response
    {
        $session = $request->getSession();
        $username = $session->get('username');

        $posts = $entityManager->getRepository(Posts::class)->findAll();


        return $this->render("home.html.twig", ["username" => $username, "posts" => $posts]);
    }

    #[Route('/form', name: 'form')]
    public function form(EntityManagerInterface $entityManager, Request $request): Response
    {
        // Validamos que este logueado 
        $session = $request->getSession();
        $username = $session->get('username');
        
        $form = $this->createForm(PostsType::class);
        if ($username == null || $username == '') {
            return $this->redirect("login"); // Si no está logueado lo mandamos al auth
        } 
                
        $form->handleRequest($request);
        
        if ($form->isSubmitted()) {
            
            $submitedData = $form->getData();
            $submitedData->setUsername($username);
            $entityManager->persist($submitedData);
            $entityManager->flush();
            
            return $this->redirectToRoute('home');
        }
        
        return $this->render("form.html.twig", ["username"=> $username,"form"=> $form->createView()]);
                
    }
    //TODO: Muchos returns, eso es code smell. Corregir

    #[Route('/post', name: 'post')]
    public function post(Request $request, EntityManagerInterface $entityManager): Response
    {
        $id = $request->get('id');
        $post = $entityManager
            ->getRepository(Posts::class)
            ->findOneBy(array('id'=> $id));

        return $this->render("post.html.twig", ["post"=> $post]);
    }

    #[Route('/login', name: 'login')]
    public function login(Request $request): Response
    {
        $session = $request->getSession();
        $username = $session->get('username');

        if ($username != null || $username != '') {
            return $this->redirectToRoute("home"); // Si está logueado lo mandamos al home
        } 

        $form = $this->createFormBuilder()
        ->add('username', TextType::class, [
            'label' => 'Nickname' 
        ])
        ->add('submit', SubmitType::class, [
            'label' => 'Enviar' 
        ])
        ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $data = $form->getData();
            $session->set('username', $data['username']);
            return $this->redirectToRoute("home");
        }

        $view = $this->render("auth.html.twig", [
            "form" => $form,
        ]);

        return $view;
    }

    #[Route('/logout', name: 'logout')]
    public function logout(Request $request): Response
    {
        $session = $request->getSession();
        $session->clear();
        return $this->redirectToRoute("home");
        
    }

    private function userIsLogged($session) {
        return isset($session["username"]) && 
            $session["username"] != null;
    }
   

}
