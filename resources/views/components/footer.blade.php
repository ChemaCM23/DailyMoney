<footer style="background-color: #ed89ff; color: #fff; padding: 20px 0;">
    <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center;">
        <!-- Primera columna -->
        <div style="margin-left: 100px">
            <ul style="list-style: none;">
                <li><a href="{{ route('aboutUs') }}" style="color: #000000; font-weight: bold; text-decoration: none; font-size: 16px; margin-bottom: 10px;">About Us</a></li>
                <li><a href="{{ route('utilities') }}" style="color: #000000; font-weight: bold; text-decoration: none; font-size: 16px; margin-bottom: 10px;">Utilities</a></li>
                <li><a href="{{ route('history') }}" style="color: #000000; font-weight: bold; text-decoration: none; font-size: 16px; margin-bottom: 10px;">History</a></li>
            </ul>
        </div>
        <!-- Segunda columna -->
        <div style="text-align: center;">
            <img src="{{ asset('storage/images/logoSinFondo.png') }}" alt="Descripción de la imagen"
            style="width: 100px; height: auto;">
        </div>
        <!-- Tercera columna -->
        <div style="margin-right: 100px; text-align: center;">
            <div>
                <h4 style="font-weight: bold; font-size: 16px; margin-bottom: 10px; color: #000000;">Contacta con nosotros</h4>
                <a href="{{ route('contact') }}" style="text-decoration: none;">
                    <button style="background-color: #5a0069; color: #fff; border: none; padding: 10px 20px; font-size: 16px; border-radius: 20px; cursor: pointer; transition: background-color 0.3s ease; &:hover {transform: translateY(-5px);}"
                    class="contact-button">Contacto</button>
                </a>
            </div>
        </div>
    </div>
</footer>
