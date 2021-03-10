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
}
</style>