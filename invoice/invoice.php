<div class="page-wrapper">
    
    <iframe width="100%" height="1000px" src="" id="bill" title="W3Schools Free Online Web Tutorials"></iframe>
    <div>
        <button class="btn btn-primary" id="print">Open Modal</button>
    </div>
    <script>
        $("iframe").attr("src", "/invoice/index.php");
        $("#print").on("click", () => {
            alert("print");
            $("#bill")[0].contentWindow.print();
        });
        $(document).on('keydown', function(e) {
            // Check if the Ctrl key (or Command key on Mac) and the 'P' key are pressed
            if ((e.ctrlKey || e.metaKey) && (e.key === 'p' || e.key === 'P')) {
                e.preventDefault(); // Prevent the default behavior (print dialog)
                $("#bill")[0].contentWindow.print();
            }
        });
    </script>
</div>