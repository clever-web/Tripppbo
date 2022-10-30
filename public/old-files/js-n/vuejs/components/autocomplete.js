var autoComplete = {
    props: ['keyword', 'autoCompleteSource'],
    data: function () {
        return {

            currentValue: "",
            CancelToken: axios.CancelToken,
            searchResultItem: {
                userFriendlyText: "",
                value: ""
            },
            cancel: function (){},

        }
    },
    watch: {
        keyword: function (val) {
            this.fetchData(val)
        }
    },
    methods: {
        fetchData: async function (val) {

            let error = false;
            cancelCurrentRequests();
            const resp = await axios.get('/autocomplete/' + val,
                {
                    cancelToken: new this.CancelToken(function executor(c) {
                        // An executor function receives a cancel function as a parameter
                        cancel = c;

                    })

                }
            ).catch(function (thrown) {
                error = true;

                if (axios.isCancel(thrown)) {

                } else {
                    // handle error
                }
            });
            if (error == false) {
                if (resp.data.length > 0) {
                    addResults(resp.data)
                } else {
                    resetAutocomplete()
                }


            }


        }
    },
    template: `<div>i am {{keyword}}</div>`
}
