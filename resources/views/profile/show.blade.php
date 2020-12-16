<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <h1>Formulaire d'ajout:</h1>
            <form name="form-create-jeu" method="post" action="{{ URL::route('ajout') }}">
                @csrf
                <div class="form-group">
                    <label for="description">Jeu</label>
                    <select name="jeu" id="jeu">
                        @foreach( \App\Models\Jeu::all() as $j)
                                <option value="{{$j -> id}}">{{ $j->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="nom">Prix</label>
                    <input type="text" id="prix" name="prix" value="{{ old('prix') }}" class="form-control" required="">
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label for="nom">Lieu</label>
                    <input type="text" id="lieu" name="lieu" value="{{ old('lieu') }}" class="form-control" required="">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <br>
            <div>
                <h1>Mes jeux: </h1>
                <br>
                @foreach(\App\Models\Achat::all() as $a)
                    @if($a->user_id == \Illuminate\Support\Facades\Auth::user()->id)
                        <ul>
                            <li>Jeu: {{\App\Models\Jeu::find($a->jeu_id)->nom}}</li>
                            <li>Prix: {{$a->prix}}</li>
                            <li>Date d'achat: {{ (new DateTime($a->date_achat))->format("%D-%M-%Y")}}</li>
                        </ul>
                        <br>
                    @endif
                @endforeach
            </div>
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('profile.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
