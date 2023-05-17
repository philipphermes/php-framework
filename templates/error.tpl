{$title = $response}
{include file="base/header.tpl" title=$title}
<div class="container">
    <div class="row center-text">
        <h1 class="title">{$response}</h1>
        <hr />
        <p><b>Message:</b> {$error}</p>
        <br />
        <p>
            <b>For more information contact our support:</b>
            <br />
            <b>Email:</b> <a href="mailto: test@shop.de">test@shop.de</a>
            <br />
            <b>Phone:</b> <a href="tel:123-456-7890">123-456-7890</a>
        </p>
        <br />
        <a class="link-button" href="/">Go back to Home</a>
    </div>
</div>
{include file="base/footer.tpl"}