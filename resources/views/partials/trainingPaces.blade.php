@if(count($seasonBestCC5k) > 0)
    <tab title="5k Training Paces">
        <athlete-training-paces :data="{{ $seasonBestCC5k }}"></athlete-training-paces>
    </tab>
@endif
@if(count($seasonBest1500m) > 0)
    <tab title="1500m Training Paces">
        <athlete-training-paces :data="{{ $seasonBest1500m }}"></athlete-training-paces>
    </tab>
@endif
@if(count($seasonBest1600m) > 0)
    <tab title="1600m Training Paces">
        <athlete-training-paces :data="{{ $seasonBest1600m }}"></athlete-training-paces>
    </tab>
@endif
@if(count($seasonBest3200m) > 0)
    <tab title="3200m Training Paces">
        <athlete-training-paces :data="{{ $seasonBest3200m }}"></athlete-training-paces>
    </tab>
@endif
