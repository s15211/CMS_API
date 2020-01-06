<?php


namespace App\Controller;


use App\Entity\BodyType;
use App\Entity\Car;
use App\Entity\EngineSize;
use App\Entity\Mark;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends FOSRestController
{
    /**
     * @Route("/addMark" , name="add_mark")
     */
    public function addMark()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $mark = new Mark();
        $mark->setName("Opel");
        //$entityManager->persist($mark);
        //$entityManager->flush();
        return $this->json(['masg' => 'OK']);
    }

    /**
     * @Route("/marks" , name="add_marks", methods={"POST"})
     */
    public function getMarks()
    {
        $marks = $this->getDoctrine()
            ->getRepository(Mark::class)
            ->findAll();
        $container = array();
        foreach ($marks as $mark)
        {
            $container[] = array(
                'id' => $mark->getId(),
                'name' => $mark->getName()
            );
        }
        $json = json_encode($container);
        return $this->json($json);
    }

    /**
     * @Route("/addBodyType" , name="add_body")
     */
    public function addBodyType()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $bodyType = new BodyType();
        $bodyType->setName("Coupe");
        //$entityManager->persist($bodyType);
        //$entityManager->flush();
        return $this->json(['masg' => 'OK']);
    }

    /**
     * @Route("/addEngineSize" , name="add_engine")
     */
    public function addEngineSize()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $engine = new EngineSize();
        $engine->setName("1.6 litre");
        //$entityManager->persist($engine);
        //$entityManager->flush();
        return $this->json(['masg' => 'OK']);
    }

    /**
     * @Route("/addCar" , name="add_car")
     */
    public function addCar()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $mark = $this->getDoctrine()
            ->getRepository(Mark::class)
            ->find(1);
        $body = $this->getDoctrine()
            ->getRepository(BodyType::class)
            ->find(1);
        $engine = $this->getDoctrine()
            ->getRepository(EngineSize::class)
            ->find(1);
        $car = new Car();
        $car->setName("Audi A1");
        $car->setBodyType($body);
        $car->setEngineSize($engine);
        $car->setMark($mark);
        $car->setYear(new \DateTime('2012-01-01'));
        //$entityManager->persist($car);
        //$entityManager->flush();
        return $this->json(['masg' => 'OK']);
    }
}