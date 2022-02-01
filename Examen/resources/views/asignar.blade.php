
<html>
    <div style="width:60%; float:left;">
        <table>
        <h2>Estos son los vuelos</h2>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Date</th>
            <th>Origin</th>
            <th>Destiny</th>
            <th>Available Seats</th>
            <th>Airplane id</th>
        </tr>
        @if(count($vuelos) > 0)
        @foreach($vuelos as $vuelo)
        <tr>
            <th>{{ $vuelo->id }}</th>
            <th>{{ $vuelo->name }}</th>
            <th>{{ $vuelo->date }}</th>
            <th>{{ $vuelo->origin }}</th>
            <th>{{ $vuelo->destiny }}</th>
            <th>{{ $vuelo->available_seats }}</th>
            <th>{{ $vuelo->airplane_id }}</th>
        </tr>
        @endforeach
        @endif
        </table>

        <br>
        <h2>Estos son los aviones</h2>
        <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Maker</th>
            <th>Seats</th>
        </tr>
        @if(count($aviones) > 0)
        @foreach($aviones as $avion)
        <tr>
            <th>{{ $avion->id }}</th>
            <th>{{ $avion->name }}</th>
            <th>{{ $avion->maker }}</th>
            <th>{{ $avion->seats }}</th>
        </tr>
        @endforeach
        @endif
        </table>
    </div>
    <div style="width:40%;float:left; background-color: lightblue;">
        <h1>Elige vuelo con avion</h1>
        <form id="formulario" method="post" action="{{ route('escogerVueloyAvion') }}">
            @csrf
        <p>Aviones</p>
            <select name="aviones">  
            @foreach($aviones as $avion)
                <option>{{ $avion->id }}</option>
            @endforeach
            </select>
            <p>Vuelos</p>
            <select name="vuelos">
            @foreach($vuelos as $vuelo)
            @if($vuelo->airplane_id == null)
                <option>{{ $vuelo->id }}</option>
            @endif
            @endforeach
            </select>
            <button>Enviar</button>
        </form>
    </div>
    <div style="width:40%;float:left; background-color: lightblue;">
        <h1>Quitar vuelo</h1>
        <table>
        <h2>Estos son los vuelos</h2>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Date</th>
            <th>Delete</th>
        </tr>
        @if(count($vuelos) > 0)
        @foreach($vuelos as $vuelo)
        @if($vuelo->airplane_id != null)
        <tr>
            <th>{{ $vuelo->id }}</th>
            <th>{{ $vuelo->name }}</th>
            <th>{{ $vuelo->airplane_id }}</th>
            <form id="formulario" method="post" action="{{ route('ruta_para_eliminar',$vuelo->id) }}">
            @csrf
            @method('delete')
                <th><button>Eliminar</button></th>
            </form>
            
        </tr>
        @endif
        @endforeach
        @endif
        </table>
        
    </div>

</html>