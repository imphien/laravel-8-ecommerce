<a href="{{ route('product', ['product' => $product->id]) }}" class="product_card">
    <div>
        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ ucfirst($product->title) }}">
    </div>

    <h3 style="display: flex; justify-content: center; align-items: center; gap: 8px;">
        {{ ucfirst($product->title) }}
        @if ($product->discount > 0)
            <span style="color: red; font-size: 14px;">Sale {{ $product->discount }}%</span>
        @endif
    </h3>

    <p style="display: flex; justify-content: center; gap: 10px; align-items: center;">
        <span style="text-decoration: line-through; color: gray;">
            {{ number_format($product->price) }} đ
        </span>
        <span style="color: green; font-weight: bold;">
            {{ number_format($product->price * (1 - $product->discount / 100)) }} đ
        </span>
    </p>
</a>
