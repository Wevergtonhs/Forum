<div>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
</div>