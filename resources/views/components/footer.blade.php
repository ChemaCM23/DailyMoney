<footer style="background-color: #9d2ffe; color: #fff; padding: 20px 0;">
    <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center;">
        <!-- Primera columna -->
        <div >
            <ul style="list-style: none;">
                <li><a href="{{ route('aboutUs') }}" style="color: #ffffff; font-weight: bold; text-decoration: none; font-size: 16px; margin-bottom: 10px;">Sobre nosotros</a></li>
                <li><a href="{{ route('utilities.index') }}" style="color: #ffffff; font-weight: bold; text-decoration: none; font-size: 16px; margin-bottom: 10px;">Utilidades</a></li>
                <li><a href="{{ route('movement.index') }}" style="color: #ffffff; font-weight: bold; text-decoration: none; font-size: 16px; margin-bottom: 10px;">Historial de movimientos</a></li>
            </ul>
        </div>
        <!-- Segunda columna -->
        <div style="text-align: center;">
            <img src="{{ asset('storage/images/logoSinFondo.png') }}" alt="Descripción de la imagen"
            style="width: 100px; height: auto;">
        </div>
        <!-- Tercera columna -->
        <div style=" text-align: center;">
            <div>
                <h4 style="font-weight: bold; font-size: 16px; margin-bottom: 10px; color: #ffffff;">Contacta con nosotros</h4>
                <a href="{{ route('contact') }}" style="text-decoration: none;">
                    <button style="background-color: #2a004f; color: #fff; border: none; padding: 10px 20px; font-size: 16px; border-radius: 20px; cursor: pointer; transition: background-color 0.3s ease; &:hover {transform: translateY(-5px);}"
                    class="contact-button">Contacto</button>
                </a>
            </div>
        </div>
    </div>
</footer>
