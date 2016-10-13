<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;


// load the form
use AppBundle\Form\TaskType;


class TestformController extends Controller
{
    /**
     * @Route("testform/new")
     */
    public function newAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
          // $form->getData() holds the submitted values
          // but, the original `$task` variable has also been updated
          $task = $form->getData();

          // ... perform some action, such as saving the task to the database
          // for example, if Task is a Doctrine entity, save it!
          // $em = $this->getDoctrine()->getManager();
          // $em->persist($task);
          // $em->flush();

          return $this->redirectToRoute('task_success');
      }

        return $this->render('testform/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("testform/success", name="task_success")
     */
    public function successAction()
    {

      return new Response(
            '<html><body>OK</body></html>'
        );

    }
}
