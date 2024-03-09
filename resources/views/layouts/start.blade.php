<link rel="stylesheet" href="{{ asset('css/start.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    crossorigin="anonymous" />
<div class="menu-wrapper">
 <ul class="menu">
        <div class="toggle">
            <ion-icon name="add-outline"></ion-icon>
        </div>
        <li style="--i:0;--clr:#ff2972">
            <a href="{{ route('pages.starting') }}"><ion-icon name="cart-outline" ></ion-icon></a>
        </li>
        <li style="--i:1;--clr:#fee800">
            <a href="{{ route('pages.record') }}"> <i class='bx bx-book-bookmark'></i></a>
        </li>
    </ul>
</div>        
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
   <script>
    let toggle = document.querySelector('.toggle')
    let menu = document.querySelector('.menu')
    toggle.onclick = function(){
        menu.classList.toggle('active')
    }
   </script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

