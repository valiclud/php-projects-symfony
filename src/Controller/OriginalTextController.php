namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("original_text")
 */
class OriginalTextController extends AbstractController
{
    /**
     * Lists all originaltext entities.
     *
     * @Route("/", name="original_text.list")
     *
     * @return Response
     */
    public function list() : Response
    {
        $texts = $this->getDoctrine()->getRepository(Original_text::class)->findAll();

        return $this->render('original_text/list.html.twig', [
            'original_text' => $texts,
        ]);
    }
}