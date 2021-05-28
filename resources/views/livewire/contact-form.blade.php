<div>
    <section id="contact" class="four">
    <div class="container">

        <header>
            <h2>Contact</h2>
        </header>

        <p>Elementum sem parturient nulla quam placerat viverra
        mauris non cum elit tempus ullamcorper dolor. Libero rutrum ut lacinia
        donec curae mus. Eleifend id porttitor ac ultricies lobortis sem nunc
        orci ridiculus faucibus a consectetur. Porttitor curae mauris urna mi dolor.</p>

        <form wire:submit.prevent="save">
            <div class="row">
                <div class="col-6 col-12-mobile"><input type="text" wire:model="name" placeholder="Name" />
                    @error('name')
                        <span>{{$message}}</span>
                    @enderror
                </div>

                <div class="col-6 col-12-mobile"><input type="email" wire:model="email" placeholder="Email" />
                    @error('email')
                        <span>{{$message}}</span>
                    @enderror
                </div>

                <div class="col-12">
                    <textarea wire:model="message" placeholder="Message"></textarea>
                </div>
                @error('message')
                   <span>{{$message}}</span>
                @enderror
                <div class="col-12">
                    <input type="submit" value="Send Message" wire:loading.attr="disable" wire:target="save"/>
                </div>
                <div wire:loading wire:target="save">
                    Enviando...
                </div>
            </div>
        </form>

    </div>
</section>

</div>
