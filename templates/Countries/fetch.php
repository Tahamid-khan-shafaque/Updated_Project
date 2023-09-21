<?php
echo $this->Form->create(null, ['url' => ['controller' => 'countries', 'action' => 'find']]);
echo $this->Form->input('name', ['id' => 'Autocomplete']);
echo $this->Form->submit();
echo $this->Form->end();
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#Autocomplete').on('keyup', function() {
        var searchTerm = $(this).val();
        if (searchTerm.length >= 2) {
            $.ajax({
                url: '<?php echo $this->Url->build(['controller' => 'countries', 'action' => 'find']); ?>',
                type: 'GET',
                data: { term: searchTerm },
                dataType: 'json',
                success: function(data) {
                    $('#Autocomplete').autocomplete({
                        source: data,
                        minLength: 2
                    });
                }
            });
        }
    });
});
</script>