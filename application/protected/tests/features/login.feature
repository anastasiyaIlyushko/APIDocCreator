Feature: Login
  I need to be able to validate the username and password.

  Scenario: Login as an existing user
    Given I am on "/site/login"
    When I fill in "LoginForm_username" with "demo"
    And fill in "LoginForm_password" with "demo"
    And press "loginButton"
    And wait 1 seconds
    Then I should be on homepage
    And should see "Logout (demo)"

  Scenario: Login as an unexisting user
    Given I am on "site/login"
    When I fill in "LoginForm_username" with "nonexistent_user"
    And fill in "LoginForm_password" with "nonexistent_password"
    And press "loginButton"
    And wait 1 seconds
    Then I should see "Incorrect username or password."
    And should see "Login"

  Scenario: Login with blank user and password
    Given I am on "site/login"
    When I fill in "LoginForm_username" with ""
    And fill in "LoginForm_password" with ""
    And press "loginButton"
    And wait 1 seconds
    Then I should see "Password cannot be blank."
    And should see "Username cannot be blank."
    And should see "Login"
