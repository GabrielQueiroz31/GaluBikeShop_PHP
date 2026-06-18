package com.gabrielqueiroz31.gamestore.Controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;

import com.gabrielqueiroz31.gamestore.Model.Game;
import com.gabrielqueiroz31.gamestore.Repository.GameRepository;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.method.support.ModelAndViewContainer;
import org.springframework.web.servlet.ModelAndView;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;



@Controller
public class GameController {
    
    //Conversar com o Crud
    @Autowired
    GameRepository gameRepository;

    @GetMapping("/game-list")
    public ModelAndView gameList() {
        ModelAndView mv = new ModelAndView("/game-list");
        mv.addObject("games", gameRepository.findAll());
        return mv;
    }

    @PostMapping("game-add")
    public ModelAndView createGame(Game game) {
        ModelAndView mv = new ModelAndView("/game-add");
        gameRepository.save(game);
        mv.setViewName("redirect:/game-list");

        return mv;
    }
    
    

}
