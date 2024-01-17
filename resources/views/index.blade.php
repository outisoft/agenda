<x-app-layout>
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <!--a href="{{ url('/dashboard') }}"
                                                                                                                                                                                                                                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a-->
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" style="display: inline-block;">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>
                @endauth
            </div>
        @endif

        <div class="max-w-5xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <img src="{{ asset('images/gp-Logo.png') }}" alt="Logo de grupo piñero" width="130" height="130">
            </div>

            <div class="mt-16 d-flex flex justify-center ">

                <div class="container-input">
                    <form action="{{ route('search') }}" method="post">
                        @csrf
                        <input id="searchInput" type="text" placeholder="Nombre, ext o departamento" name="query"
                            class="input autofocus">
                        <svg fill="#000000" width="20px" height="20px" viewBox="0 0 1920 1920"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z"
                                fill-rule="evenodd"></path>
                        </svg>
                    </form>
                </div>

                @auth
                    <a href="#"
                        class="btn-ico font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                        data-toggle="modal" data-target="#myModal" data-placement="top" title="Agregar Nuevo Registro">
                        <i class='bx bx-user-plus' style="font-size: 2.7em;"></i>
                    </a>
                @endauth


                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Mi Formulario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" class="form-control" id="nombre"
                                            placeholder="Ingrese su nombre">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Correo electrónico:</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Ingrese su correo electrónico">
                                    </div>
                                    <!-- Agrega más campos según tus necesidades -->

                                    <!-- Botón de envío del formulario -->
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <br>

            <div class="card-datatable
                    table-responsive pt-0">
                <div class="text-nowrap" id="searchResults">
                    @if ($agenda->isEmpty())
                        <h5 class="card-header">No se encontro registro de empleados.</h5>
                    @else
                        <table id="agenda" class="modal">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Puesto</th>
                                    <th>Departamento</th>
                                    <th>Hotel</th>
                                    <th>Extencion</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody id="agendaList">
                                <!-- Aquí se mostrarán los empleados -->
                                @foreach ($agenda as $agenda)
                                    <tr>
                                        <td>{{ $agenda->Nombre }}</td>
                                        <td>{{ $agenda->Puesto }}</td>
                                        <td>{{ $agenda->Departamento }}</td>
                                        <td>{{ $agenda->Hotel }}</td>
                                        <td>{{ $agenda->Extension }}</td>
                                        <td>{{ $agenda->Email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>


            <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                    <div class="flex items-center gap-4">
                        <a href="#"
                            class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5"
                                class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                            Outisoft.inc
                        </a>
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>
    </div>


    @section('js')
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script>
            document.addEventListener('keydown', function(event) {
                if (event.key === "Enter") {
                    event.preventDefault();
                }
            });
            $(document).ready(function() {
                // Ocultar la tabla al inicializar
                $('#agenda').hide();
                $('#searchInput').on('input', function() {
                    var query = $(this).val();

                    // Deshabilitar el envío del formulario al presionar "Enter"
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        return;
                    }

                    // Verificar si el campo de búsqueda está en blanco
                    if (query.trim() === '') {
                        // Si está en blanco, ocultar la tabla y salir de la función
                        $('#agenda').hide();
                        return;
                    }

                    $.ajax({
                        url: "{{ route('search') }}",
                        type: "POST",
                        data: {
                            query: query,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $('#searchResults').html(response);
                            // Mostrar la tabla después de realizar una búsqueda
                            $('#miTabla').show();
                        }
                    });
                });
            });
        </script>

        <!-- JavaScript para mostrar y ocultar el modal -->
        <script>
            // Obtener el modal
            var modal = document.getElementById('myModal');

            // Obtener el botón que abre el modal
            var btn = document.getElementById("myBtn");

            // Obtener el elemento <span> que cierra el modal
            var span = document.getElementsByClassName("close")[0];

            // Cuando el usuario hace clic en el botón, abrir el modal
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // Cuando el usuario hace clic en <span> (x), cerrar el modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // Cuando el usuario hace clic en cualquier lugar fuera del modal, cerrarlo
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    @endsection
</x-app-layout>
