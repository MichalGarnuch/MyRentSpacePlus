@props(['route', 'icon', 'title', 'text'])

<a href="{{ route($route) }}" class="col-md-4 mb-3 text-decoration-none">
    <div {{ $attributes->merge(['class' => 'card h-100']) }}>
        <div class="card-body text-center">
            <i class="fa {{ $icon }} fa-2x mb-2"></i>
            <h5 class="card-title">{{ $title }}</h5>
            <p class="card-text">{{ $text }}</p>
        </div>
    </div>
</a>
