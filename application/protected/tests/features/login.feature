Feature: Login
  I need to be able to validate the username and password.

  Scenario: Login as an existing user
    Given I am on "/site/login"
    When I fill in "LoginForm_username" with "demo"
    And I fill in "LoginForm_password" with "demo"
    And I press "yt0"
    Then I should be redirected
    And I should see "Logout (demo)"

  Scenario: Login as an unexisting user
    Given I am on "site/login"
    When I fill in "LoginForm_username" with "nonexistent_user"
    And I fill in "LoginForm_password" with "nonexistent_password"
    And I press "yt0"
    Then I should see "Incorrect username or password."
    And I should see "Login"
