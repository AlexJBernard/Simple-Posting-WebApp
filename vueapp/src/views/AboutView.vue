<script setup>
import{ onMounted } from 'vue'
import {useRoute} from 'vue-router'

import { CurrentRoute } from '../state/CurrentRoute'

onMounted(() => {
  CurrentRoute.setRoute(useRoute().name)
})
</script>

<template>
  <header>
    <h1>Alex Bernard</h1>
    <h2>Software / Web Developer</h2>
  </header>
  <main>
    <section class="resume-section" id="resume-intro">
      NC State graduate with a degree in computer science. Experienced with back and front end
      coding with languages such as Java, Javascript, and Lua.
    </section>
    <section class="resume-section" id="resume-projects">
      <h2>
        Projects
      </h2>
      <section class="resume-item" id="project-gamejam">
        <h3>
          Mini Jam 166: Mining Risk
        </h3>
        <p class="project-description" id="gamejam-description">
          Created a 2D score attack game for Windows computers for a Game Jam hosted on itch.io.
        </p>
        <div class="project-contributions" id="gamejam-contributions">
          <h4>Key Contributions</h4>
          <ul>
            <li>
              Used Lua and the Love2D gaming framework for the game's primary logic
            </li>
            <li>
              Implemented external libraries such as <i>lume</i> and <i>bump</i> for handling
              complex algorithms and functions such as collision and distance calculations.
            </li>
            <li>
              Managed time given to deliver a finished product within a 3-day deadline.
            </li>
          </ul>
        </div>
      </section>
      <section class="resume-item" id="project-nomination">
        <h3>
          NCSU - Student Nomination Manager
        </h3>
        <p class="project-description" id="project-about">
          Lead the development for a Student Nomination manager for NC State's Computer Science
          Department. created using the Lamp stack alongside the Slim and Twig PHP frameworks
        </p>
        <h4>Key Contributions</h4>
        <ul>
          <li>
            Worked on the project back-end, with a focus on handling user input.
          </li>
          <li>
            Created front-end pages for viewing created nominations using Twig and Slim Frameworks
          </li>
          <li>
            Created authentication middleware for determining a user's role from the id provided
            by Shibboleth.
          </li>
        </ul>
      </section>
    </section>
    <section class="resume-section" id="resume-education">
      <h2 class="section-header">
        Education
      </h2>
      <section class="resume-item" id="education-ncsu">
        <h3>NC State University: Raleigh NC</h3>
        <p>Bachelor's of Computer Science: 2020 - 2023</p>
      </section>
      <section class="resume-item" id="education-jcc">
        <h3>Johston Community College: Smithfield NC</h3>
        <p>Bachelor's of Computer Science: 2018 - 2020</p>
      </section>
    </section>
  </main>
</template>
