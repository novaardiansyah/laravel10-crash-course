@extends('layout.layout')

@section('content')
  <div class="row">
    <div class="col-3">
      @include('shared.left-sidebar')
    </div>
    <div class="col-6">
      <h1>Terms and Condition</h1>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas pariatur repellat atque voluptates alias nostrum quisquam eum voluptatibus accusamus! Culpa fuga possimus vel adipisci autem quibusdam suscipit itaque, iusto a, voluptatem error voluptas soluta fugit quasi magnam non quos ducimus vitae sit magni dignissimos earum. Quasi ut aliquid facere maxime inventore molestiae est amet magni laborum? Perspiciatis ad exercitationem id, molestias accusantium cum earum debitis voluptatem numquam illum tenetur dolorem? Officia iure doloribus possimus exercitationem error quas. Laborum incidunt harum molestiae recusandae sit eum, magnam molestias, deleniti aut reiciendis itaque temporibus similique, quidem nobis a esse animi in assumenda perspiciatis!</p>
    </div>
    <div class="col-3">
      @include('shared.search-bar')
      @include('shared.follow-box')
    </div>
  </div>
@endsection