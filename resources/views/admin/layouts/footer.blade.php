<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2022 <div class="bullet"></div> Lazismu
    </div>
</footer>
</div>
</div>

@include('sweetalert::alert')
</body>
<script>
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }
    let page = getParameterByName("page");
</script>


</html>