<div>
    <form action="{{ route('orders.store') }}" method="post">
        @csrf
        <button type="submit">send</button>
    </form>
</div>