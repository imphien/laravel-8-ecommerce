<x-app-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    </x-slot>
    {{--------------------- 
            $slot 
        --------------------}}
    <section>
        <main class="_container">
            <div class="product flex_align">
                <img style="max-height: 450px; object-fit:cover; width: 450px"
                     src="{{ asset('storage/'.$product->image) }}" alt="{{$product->title}}">
                <div class="details">
                    <h1>{{ucfirst($product->title)}}</h1>
                    <div style="margin: 10px 0;">
                        @if ($product->discount > 0)
                            <h3 style="display: flex; gap: 12px; align-items: center;">
                            <span style="text-decoration: line-through; color: gray;">
                                {{ number_format($product->price) }} VNĐ
                            </span>
                                                <span style="color: red; font-weight: bold;">
                                {{ number_format($product->price * (1 - $product->discount / 100)) }} VNĐ
                            </span>
                                                <span style="background: red; color: white; padding: 2px 6px; border-radius: 4px; font-size: 13px;">
                                -{{ $product->discount }}%
                            </span>
                            </h3>
                        @else
                            <h3 style="font-weight: bold;">
                                {{ number_format($product->price) }} VNĐ
                            </h3>
                        @endif
                    </div>

                    <p>Danh mục : {{$product->category->title}}</p>
                    <p>{{ $product->stock_quantity > 0 ? "Còn hàng" : "Hết hàng " }}</p>
                    <textarea cols="60" rows="20" style="resize: none; font-family: 'Roboto', serif; font-size: 17px"
                              disabled="disabled" readonly>
                            {{ucfirst($product->about)}}
                        </textarea>
                    @if ($isAdded)
                        <button class="cta" onclick="window.location = '{{ route('cart') }}'">Tới giỏ hàng</button>
                    @else
                        @auth
                            <form action="{{ route('atc', ['product'=>$product->id]) }}" method="post">
                                @csrf
                                <button type="submit" class="cta">Thêm vào giỏ hàng</button>
                            </form>
                        @endauth
                        @guest
                            <button class="cta" onclick="addToCart({{$product->id}})" data-product="{{ $product->id }}">
                                Thêm vào giỏ hàng
                            </button>
                        @endguest
                    @endif
                </div>
            </div>
        </main>
    </section>

    {{--------------------- 
        $slot 
    --------------------}}
</x-app-layout>