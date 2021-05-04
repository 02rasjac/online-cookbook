<footer class="bg-primary">
  <div class="d-flex justify-content-between container text-white pt-3 pb-3">
    <div class="text-start">
      <h3>Kontakta Oss</h3>
      <ul>
        <li>
          <a href="mailto:"><i class="fas fa-envelope"></i> example@gmail.com</a>
        </li>
      </ul>
    </div>
    <div class="text-center">
      <h3>Länkar</h3>
      <ul>
        <li>
          <a href="{{ route('index') }} ">Startsidan</a>
        </li>
        <li>
          <a href="{{ route('register') }}">Registrera</a>
        </li>
        <li>
          <a href="{{ route('login') }}">Logga In</a>
        </li>
        <li>
          <a href="route('cookbook')">Kokbok</a>
        </li>
        <li>
          <a href="route('planer')">Måltidsplanerare</a>
        </li>
      </ul>
    </div>
    <div class="text-end">
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
  <div class="bg-dark text-center text-white-50 p-2">
    <p>&copy; Rasmus Jacklin 2021</p>
  </div>
</footer>
