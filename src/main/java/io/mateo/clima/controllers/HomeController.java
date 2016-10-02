package io.mateo.clima.controllers;

import io.mateo.clima.domain.condition.Conditions;
import io.mateo.clima.services.WundergroundService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

@Controller
public class HomeController {

    private final WundergroundService wundergroundService;
    private final Logger log = LoggerFactory.getLogger(this.getClass());

    @Autowired
    public HomeController(WundergroundService wundergroundService) {
        this.wundergroundService = wundergroundService;
    }

    @RequestMapping("/")
    public String index() {
        return "index";
    }

    @RequestMapping(value="/conditions", method = RequestMethod.GET)
    public String conditions(@RequestParam("state") String state, @RequestParam("city") String city, Model model) {
        Conditions conditions = this.wundergroundService.getCurrentConditions(state, city);
        model.addAttribute("city", city);
        model.addAttribute("state", state);
        model.addAttribute("conditions", conditions);
        return "conditions";
    }
}
