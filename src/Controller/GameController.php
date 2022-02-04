<?php

namespace App\Controller;

use App\Entity\Game;
use App\Repository\GameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    /**
     * @Route("/game/{id}", name="game", methods={"GET"})
     */
    public function show(Game $game, GameRepository $gameRepository): Response
    {
        $games = $gameRepository->findAll();
        return $this->render('game/show.html.twig', [
            'game' => $game,
            'games' => $games
        ]);
    }

    /**
     * @Route("/game/level/{level}", name="game_level", methods={"GET"})
     */
    public function nextLevel(int $level, Game $game, GameRepository $gameRepository): Response
    {
        $games = $gameRepository->findAll();
        $nextGame = $gameRepository->findOneBy(['level' => $level + 1]);
        if(!$nextGame){
            $nextGame = $gameRepository->findOneBy(['level' => 1]);
            return $this->redirectToRoute('game', ['id' => $nextGame->getId()], Response::HTTP_SEE_OTHER);
        } else {
            $gameId = $nextGame->getId();
            return $this->redirectToRoute('game', ['id' => $gameId], Response::HTTP_SEE_OTHER);
        }
    }

}
