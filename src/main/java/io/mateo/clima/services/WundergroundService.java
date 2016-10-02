package io.mateo.clima.services;

import io.mateo.clima.domain.condition.Conditions;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Service;
import org.springframework.web.client.RestTemplate;

/**
 * Created by Francisco Mateo <cisco21c@gmail.com>
 */
@Service
public class WundergroundService {

    @Value("${wunderground.api.url.conditions}")
    private String conditionsUrl;

    private final RestTemplate restTemplate;

    @Autowired
    public WundergroundService(RestTemplate restTemplate) {
        this.restTemplate = restTemplate;
    }

    public Conditions getCurrentConditions(String state, String city) {
        return this.restTemplate.getForObject(this.conditionsUrl, Conditions.class, state, city);
    }
}
