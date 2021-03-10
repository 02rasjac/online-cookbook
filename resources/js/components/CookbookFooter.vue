<template>
  <footer class="wrapper">
    <div class="container">
      <div class="column">
        <h3>Kontakta Oss</h3>
        <ul>
          <li>
            <a href="mailto:"
              ><i class="fas fa-envelope"></i> example@gmail.com</a
            >
          </li>
        </ul>
      </div>
      <div class="column">
        <h3>Länkar</h3>
        <ul>
          <li>
            <a :href="route('index')">Startsidan</a>
          </li>
          <li>
            <a :href="route('register')">Registrera</a>
          </li>
          <li>
            <a :href="route('login')">Logga In</a>
          </li>
          <li>
            <a href="route('cookbook')">Kokbok</a>
          </li>
          <li>
            <a href="route('planer')">Måltidsplanerare</a>
          </li>
        </ul>
      </div>
      <div class="column">
        <h3>Sociala Medier</h3>
        <ul>
          <li>
            <a href="#">Twitter <i class="fab fa-twitter"></i></a>
          </li>
          <li>
            <a href="#">Instagram <i class="fab fa-instagram"></i></a>
          </li>
          <li>
            <a href="#">Github <i class="fab fa-github"></i></a>
          </li>
        </ul>
      </div>
    </div>
    <div class="second-footer">
      <p>&copy; Rasmus Jacklin 2021</p>
    </div>
  </footer>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
@import "../../sass/app.scss";
.wrapper {
  background-color: $primary-color;
}

.container {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;

  .column:nth-of-type(2) {
    text-align: center;
  }

  .column:last-of-type {
    text-align: right;
  }

  h3 {
    font-size: 1.3rem;
    font-weight: 600;
    color: $primary-text-color;
    text-transform: uppercase;
  }
}

.second-footer {
  text-align: center;
  color: $primary-text-color;
  font-size: 0.9em;
  font-weight: 300;
  background-color: darken($primary-color, 10%);
  padding: 0.4em 0;
}
</style>