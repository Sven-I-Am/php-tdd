# Unit testing in PHP (Symfony) <!-- Exercise title -->

<!-- ## published site -->

<!-- ## screenshot of user stories -->

<!-- ## link to the project board and tickets -->

### exercise in week 17 (17/01/2022 - 21/01/2022)<!-- NR (from date - to date)--> of our BeCode training
You can find the original exercise readme [by clicking here](https://github.com/becodeorg/ANT-Lamarr-5.34/tree/main/3.The-Mountain/TDD)

## Table of content

|     |                                                                         |
|-----|-------------------------------------------------------------------------|
| 1   | [Challenge](#challenge)                                                 |
| 2   | [The objective of this exercise](#the-objective-of-this-exercise)       |
| 3   | [The group](#the-group)                                                 |
| 4   | [Tools and languages used](#tools-and-languages-used)                   |
| 5   | [Timeline](#timeline)                                                   |
| 6   | [What I learned from this exercise](#what-i-learned-from-this-exercise) |
| 7   | [To Do](#to-do)                                                         |
| 8   | [Installation Instructions](#installation-instructions)                 |
|     |

## Challenge

In the next 3 days we are exploring unit tests and test driven development.  
Our coach provided us with a couple of great resources to start with before we dive into the actual coding part of this exercise.
We'll be building a simple meeting room reservation application, but the challenge will be to write the tests before we write the actual code.

## The objective of this exercise

By the end of this exercise we should have a decent understanding of unit testing and the power of test driven development
I'll be working with PHPUnit through Symfony and following [the documentation provided by Symfony](https://symfony.com/doc/current/testing.html)

## The group
<!--give credit where it's due and link to group member's GitHub pages-->
This is a solo exercise

## Tools and languages used

<!--Adjust the content of this table per exercise
Logos are added on a project basis, I have them stored in a separate folder locally, ready for copying-->

|                                           |                                             |                                         |
|-------------------------------------------|---------------------------------------------|-----------------------------------------|
| ![Ubuntu](./src/Assets/ubuntu-logo.png)   | ![phpstorm](./src/Assets/phpstorm-logo.png) | ![apache](./src/Assets/apache-logo.png) |
| ![Symfony](./src/Assets/symfony-logo.png) | ![composer](./src/Assets/composer-logo.png) | ![twig](./src/Assets/twig-logo.png)     |
| ![php](./src/Assets/php-logo.png)         | ![Git](./src/Assets/git-logo.png)           | ![github](./src/Assets/github-logo.png) |

## Timeline
<!-- fill in the timeline with what happened, challenges and how you overcame them, little victories, link sources if possible -->
- day 1 (:date: 17/01/2022)
  - I had a late start due to some other engagements
  - I then spent the hours after lunch reading up on unit testing
  - Got my environment set up right before the end of the day
  - Started this README and created + did first commit to the remote repository
- day 2 (:data: 18/01/2022)
  - today started with re-watching the provided [YouTube video on TDD](https://www.youtube.com/watch?v=WMqe0jkqPMQ&ab_channel=PeteGeorge)
  - I then created the requested entities and their relations using the `symfony console make:entity` command
  - Using `symfony console make:migration` followed by `symfony console doctrine:migrations:migrate` I created the database
  - now I can start writing the tests (the first test is provided through [the exercise readme](https://github.com/becodeorg/ANT-Lamarr-5.34/tree/main/3.The-Mountain/TDD#general-flow))
  - The first test gave me some grief, but it was a matter of following the clues given in the error messages and then checking the class constructors type declarations (bool and Boolean are not the same!)
  - The second test ran smoother, and I leaned it down to check only for valid timestamps, since I'll be adding a test to check that the endDate is always later than the startDate
  - I added a check for the endDate to ensure the end date is always after the start date, and I made the duration check dependant on the endDatecheck
  - I rewrote my previous check and added a check to ensure both duration and endDate are true before returning true,
    - this will allow me to have specific error messages if false is returned on either
  - 

## What I learned from this exercise
<!--here you can write anything from a short summary on the subject of the exercise, a readable description of the new skills/knowledge you acquire, to an in depth clarification. As long as it helps you retain what you learned, or easily find the information when working on future projects-->

## To Do

This to do list is for personal use, the full to do list is added at the start of the challenge and as we complete
objectives they will be moved up into the timeline section and ticked off using emotes such as :heavy_check_mark:

<!--For now, this list is usually provided by BeCode and thus quite static. When working on outside projects, this list will become more dynamic as the projects grow and evolve-->

### must-haves

### Nice to have


## Installation Instructions
<!--write clear instructions on how to get your project working on the user's local environment-->
1. clone this repository to your local environment
2. make sure you have Symfony, Symfony CLI and Doctrine installed (follow [the docs](https://symfony.com/doc/current/index.html) if you don't have it yet)
3. check that you're using PHP8.0 with `symfony local:php:list`
4. create an empty database on your localhost and adjust the .env file to have the correct information (never commit sensitive data to a remote repository!)
5. run `symfony console doctrine:migrations:migrate` to create the database tables and information
6. if all is well you can run `symfony server:start` to start up a dev server
7. happy coding :tada:
