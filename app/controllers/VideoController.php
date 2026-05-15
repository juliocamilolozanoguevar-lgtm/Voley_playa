<?php
declare(strict_types=1);

class VideoController extends Controller
{
    public function index(): void
    {
        if (!$this->requireAuth()) {
            return;
        }

        $this->view('video/index', [
            'title' => 'Video | Voley Diloz',
            'scripts' => ['js/video.php'],
            'activePage' => 'video',
        ]);
    }
}
