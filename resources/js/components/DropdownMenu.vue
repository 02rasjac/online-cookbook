<template>
  <div class="dropdown-container">
    <slot name="activator"></slot>

    <div class="dropdown-content">
      <nav>
        <slot name="content"></slot>
      </nav>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
@import "../../sass/app.scss";

.dropdown-container {
  position: relative;
  display: inline-block;

  &:hover .dropdown-content {
    display: block;
  }
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: $body-bg;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;

  a {
    color: $secondary-text-color;
    padding: 12px 16px;
    text-decoration: none;
    display: block;

    &:hover {
      background-color: #ddd;
      transition-duration: 0.5s;
    }
  }
}

.fas {
  margin-right: 0.5em;
}
</style>>
