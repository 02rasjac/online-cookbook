<template>
  <div class="wrapper">
    <header>
      <a :href="route('index')" class="site-name">Kokboken Online</a>

      <nav>
        <ul>
          <li><a href="">Kokbok</a></li>
          <li><a href="">Planerare</a></li>
          <template v-if="!authenticated">
            <li>
              <a :href="route('login')" class="secondary-link">Logga In</a>
            </li>
            <li>
              <a :href="route('register')" class="primary-link">Registrera</a>
            </li>
          </template>
          <template v-else-if="authenticated">
            <a
              class="dropdown-item"
              :href="route('logout')"
              onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
            >
              Logga Ut
            </a>

            <form
              id="logout-form"
              :action="route('logout')"
              method="POST"
              class="d-none"
            >
              <input type="hidden" name="_token" :value="token" />
            </form>
          </template>
        </ul>
      </nav>
    </header>
  </div>
</template>

<script>
export default {
  props: { authenticated: Number, token: String },
};
</script>

<style scoped lang="scss">
@import "../../sass/app.scss";

$transition-hover-dur: 0.5s;

.wrapper {
  position: absolute;
  top: 0;
  padding: 1.5em;
  width: 100vw;
  margin: 0 auto;
  background-color: $primary-color;
  box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.21);
}

header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  max-width: 1200px;
  margin: auto;

  .site-name {
    font-weight: bold;
  }

  ul {
    display: flex;

    li a {
      padding: 0 0.6em;
      margin-left: 0.8em;
      transition-duration: $transition-hover-dur;

      &:hover {
        color: darken($primary-text-color, 20);
        transition-duration: $transition-hover-dur;
        text-decoration: underline;
      }

      &.primary-link {
        @include primary-link($secondary-color);
        color: $secondary-text-color;
        padding: 0 0.8em;

        &:hover {
          color: lighten($secondary-text-color, 20);
          transition-duration: $transition-hover-dur;
        }
      }

      &.secondary-link {
        @include secondary-link($secondary-color);
        color: $primary-text-color;
        padding: 0 0.8em;

        &:hover {
          color: darken($primary-text-color, 20);
          transition-duration: $transition-hover-dur;
        }
      }
    }
  }
}
</style>