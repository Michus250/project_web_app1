@extends('layouts.app')

@section('content')

<section id="kontakt">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2>Skontaktuj się z nami</h2>
          <p>Nie wahaj się skontaktować z nami w przypadku jakichkolwiek pytań lub wątpliwości. Nasz przyjazny personel zawsze chętnie pomoże.</p>
          <ul class="list-unstyled">
            <li>
              <i class="fa fa-phone"></i>
              <a href="tel:555-555-5555">555-555-5555</a>
            </li>
            <li>
              <i class="fa fa-envelope"></i>
              <a href="mailto:info@dentalclinic.com">info@dentalclinic.com</a>
            </li>
            <li>
              <i class="fa fa-map-marker"></i>
              <address>123 Main St, Suite 100<br>Anytown, USA</address>
            </li>
          </ul>
        </div>
        <div class="col-md-6">
          <form>
            <div class="form-group">
              <label for="name">Imię</label>
              <input type="text" class="form-control" id="name" placeholder="Twoje imię">
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" class="form-control" id="email" placeholder="Twój adres e-mail">
            </div>
            <div class="form-group">
              <label for="message">Wiadomość</label>
              <textarea class="form-control" id="message" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Wyślij</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  

@endsection