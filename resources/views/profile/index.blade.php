@extends ('layouts.app')

@section ('content')
    <div>
      <input type="text" v-model="name">
      <input type="file" @change="fileChanged">
    </div>

    <img :src="url" alt="">

    <button @click.prevent="send">Send</button>
    <div id="app">
        <div class="card" style="width: 18rem;" v-for="profile in profiles">
            <img class="card-img-top" :src="profile.profile_url" alt="Card profile cap">
            <div class="card-body">
                <h5 class="card-title">@{{ profile.name }}</h5>
                <a href="#" class="btn btn-danger"  @click.prevent="deleteProfile(profile)">Delete</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
    document.profiles = {
        pageUrls: {
            profile_index: '{{ route('profile.index') }}',
            profile_delete: '{{ route('profile.destroy', '') }}',
            profile_store: '{{ route('profile.store') }}',
        }
    };
</script>
<script type="text/javascript" src="{{ mix('js/pages/profile/index.js') }}" defer></script>
@endsection

{{-- @section('scripts')
    <script>
        new Vue({
            el: '#app',

            data: {
                profiles: []
            },

            mounted(){
                this.loadData();
            },

            methods: {
                /**
                 * Load data
                 */
                loadData (){
                    let url = '{{ route('profile.index') }}';

                    axios.get(url)
                         .then (res => this.profiles = res.data);
                },

                /**
                 * Delete profile
                 *
                 * @param      {<type>}  profile  The profile
                 */
                deleteProfile(profile){
                    let url = '{{ route('profile.destroy', '') }}/' + profile.id;

                    axios.delete (url)
                         .then (res => alert ('deleted'));
                }
            }
        });
    </script>
@endsection
 --}}
