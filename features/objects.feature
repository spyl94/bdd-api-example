Feature: Objects RestFul Api
 As an API client
 I want see all objects of the game
 So that I can chose which I want to use

 Scenario: List game objects
    Given I send a GET request to "/objects"
    Then the JSON response should match:
    """
    [
        {
            "id": @integer@,
            "name": @string@,
            "bonuses": @...@,
            "cost": {
              "currency": @string@,
              "value": @integer@
            }
        },
        @...@
    ]
    """
