new Vue({
    el: '#app',

    data: {
        name: '',
        file: {},
        url: '',
        profiles: []

    },

    computed: {
    },

    mounted() {
        this.loadData();
    },


    methods: {

        fileChanged(sender){
            this.file = sender.target.files[0];
        },

        send(){
            let formData = new FormData ();
            let config = {
                 headers: {
                    'Content-Type': 'multipart/form-data'
                }
            };

            formData.append ('name', this.name);
            formData.append ('file', this.file, this.file.name);

            axios.post ('/profile', formData, config)
                .then(res => this.url = res.data,
                      err => alert(err.message));
        },

        loadData (){
            let data = {
                url: document.profiles.pageUrls.profile_index,
            };
            axios.get(data.url)
                 .then (res => this.profiles = res.data);
        },

        /**
         * Delete profile
         *
         * @param      {<type>}  profile  The profile
         */
        deleteProfile(profile){
            let data = {
                url: document.profiles.pageUrls.profile_delete + '/' + profile.id,
            };

            axios.delete (data.url)
                 .then (res => alert ('deleted'));
        }
    }
})
