<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Merci de vous être enregistrer ! Mais avant de commencer, pouvez-vous vérifier votre adresse mail en cliquant sur le lien que nous venons de vous envoyer ? Si vous n\'avez pas reçu ce mail, nous pouvons vous en renvoyez un.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Un nouveau lien de vérification vient de vous être envoyer au mail donné lors de votre enregistrement.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('Demander un nouveau mail de vérification') }}
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('De déconnecter') }}
                </button>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
