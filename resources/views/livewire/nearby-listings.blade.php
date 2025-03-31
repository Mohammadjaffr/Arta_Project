<div>
    <div class="nearby-listings-container">
        @if($showButton)
            <button
                wire:click="requestLocation"
                wire:loading.attr="disabled"
                class="btn btn-primary"
            >
                @if($isLoading)
                    <span class="spinner-border spinner-border-sm"></span>
                    جاري البحث...
                @else
                    <i class="fas fa-location-arrow"></i> عرض الإعلانات القريبة
                @endif
            </button>
        @endif

        @if($currentRegion)
            <div class="alert alert-info mt-3">
                الإعلانات في منطقة: <strong>{{ $currentRegion->name }}</strong>
            </div>
        @endif

        <div class="listings-grid mt-4">
            @foreach($listings as $listing)
                <div class="listing-card">
                    <h5>{{ $listing->title }}</h5>
                    <p class="text-muted">
                        <i class="fas fa-map-marker-alt"></i> {{ $listing->region->name }}
                    </p>
                    <!-- المزيد من تفاصيل الإعلان -->
                </div>
            @endforeach
        </div>

        @push('scripts')
            <script>
                document.addEventListener('livewire:init', () => {
                    Livewire.on('request-user-location', () => {
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(
                                (position) => {
                                    Livewire.dispatch('found-location', {
                                        lat: position.coords.latitude,
                                        lng: position.coords.longitude
                                    });
                                },
                                (error) => {
                                    alert('يجب السماح بصلاحيات الموقع لرؤية الإعلانات القريبة');
                                    Livewire.dispatch('location-error');
                                }
                            );
                        } else {
                            alert('المتصفح لا يدعم خدمة الموقع الجغرافي');
                        }
                    });
                });
            </script>
        @endpush
    </div>
</div>
