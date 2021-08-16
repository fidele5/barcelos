paypal.Button.render({
        env: 'sandbox',
        commit: true,
        style: {
            color: 'blue',
            size: 'responsive'
        },
        payment: function() {

            var CREATE_URL = '/paiement/create';

            return paypal.request.get(CREATE_URL)
                .then(function(data) {
                    console.log(data);
                    if (data.status === "success") {
                        return data.paypal_response.id;
                    } else {
                        $("#classe").removeClass('modal-success').addClass("modal-warning");
                        $("#msg").text(data.msg);
                        $('#centralModalSuccess').modal('show');
                        return false;
                    }
                });
        },
        onAuthorize: function(data, actions) {
            var EXECUTE_URL = '/paiement/authorize';

            var data = {
                paymentID: data.paymentID,
                payerID: data.payerID,
                _token: $('meta[name="csrf-token"]').attr('content')
            };
            return paypal.request.post(EXECUTE_URL, data)
                .then(function(data) {
                    if (data.status == "success") {
                       location.href="/articles";
                    } else {
                        $("#classe").removeClass('modal-success').addClass("modal-warning");
                        $("#msg").text(data.msg);
                        $('#centralModalSuccess').modal('show');
                    }
                });
        },
        onCancel: function(data, actions) {
            $("#classe").removeClass('modal-success').addClass("modal-warning");
            $("#msg").text("Paiement annulé : vous avez fermé la fenêtre de paiement.");
            $('#centralModalSuccess').modal('show');
        },
        onError: function(err) {
            $("#classe").removeClass('modal-success').addClass("modal-danger");
            $("#msg").text("Paiement annulé : une erreur est survenue. Merci de bien vouloir réessayer ultérieurement.");
            $('#centralModalSuccess').modal('show');
        }
    },
    '#payer');