Feature: Unlockeds RestFul Api
 As an API client
 I want unlock game objects
 So that I can use them in the game

 Scenario: Logged in API client wants to list his unlockeds objects
    Given I am logged in as "user"
    And I send a GET request to "/unlockeds"
    Then the JSON response should match:
    """
    [
        @...@
    ]
    """

 Scenario: Anonymous API client wants to list his unlockeds objects
    When I send a GET request to "/unlockeds"
    Then the response status code should be 400

  @database
  Scenario: Logged in API client with enough currencies wants to unlock an object
    Given I am logged in as "user"
    When I send a POST request to "/unlockeds" with json:
    """
    {
        "object": 1
    }
    """
    Then the response status code should be 201

  Scenario: Logged in API client with not enough currencies wants to unlock an object
    Given I am logged in as "user"
    And "user" has no money left
    When I send a POST request to "/unlockeds" with json:
    """
    {
        "object": 1
    }
    """
    Then the response status code should be 400

  Scenario: Anonymous API client wants to unlock an object
    When I send a POST request to "/unlockeds" with json:
    """
    {
        "object": 1
    }
    """
    Then the response status code should be 400
