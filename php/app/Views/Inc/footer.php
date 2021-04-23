    <footer class="bg-blue-600 text-red-50 text-center p-2">
        <p>&copy; Copyright &middot; Boutin Grégory &middot; <span id="date-copyright"></span></p>
    </footer>
</body>
</html>

<script src="resources/js/global.js"></script>
<script src="resources/js/products.js"></script>
<?php if ($_SERVER['REQUEST_URI'] != '/products') { ?>
    <script src="resources/js/comments.js"></script>
<?php } ?>

