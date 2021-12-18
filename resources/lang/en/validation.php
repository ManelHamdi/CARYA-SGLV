<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'le champ :attribute doit être accepté.',
    'accepted_if' => 'le champ :attribute doit être accepté lorsque :other est :value.',
    'active_url' => 'le champ :attribute n\'est pas une URL valide.',
    'after' => 'le champ :attribute doit être une date après :date.',
    'after_or_equal' => 'le champ  :attribute doit être une date après ou égale à :date.',
    'alpha' => 'le champ :attribute ne doit contenir que des lettres.',
    'alpha_dash' => 'le champ :attribute ne doit contenir que des lettres, des chiffres, des tirets et des traits de soulignement.',
    'alpha_num' => 'le champ :attribute ne doit contenir que des lettres et des chiffres.',
    'array' => 'le champ :attribute doit être un tableau.',
    'before' => 'le champ :attribute doit être une date avant :date.',
    'before_or_equal' => 'le champ :attribute doit être une date avant ou égale à :date.',
    'between' => [
        'numeric' => 'le champ :attribute doit être entre :min et :max.',
        'file' => 'le champ :attribute doit être entre :min et :max kilobytes.',
        'string' => 'le champ :attribute doit être entre :min et :max characters.',
        'array' => 'le champ :attribute doit être entre :min et :max items.',
    ],
    'boolean' => 'the :attribute field must be true or false.',
    'confirmed' => 'the :attribute confirmation does not match.',
    'current_password' => 'le champ mot de passe est incorrect.',
    'date' => 'le champ :attribute n\'est pas une date valide.',
    'date_equals' => 'le champ :attribute doit être une date égale à :date.',
    'date_format' => 'le champ :attribute ne correspond pas au format :format.',
    'declined' => 'the :attribute must be declined.',
    'declined_if' => 'le champ :attribute must be declined when :other is :value.',
    'different' => 'le champ :attribute et :other doit être différent.',
    'digits' => 'le champ :attribute doit être :digits chiffres.',
    'digits_between' => 'le champ :attribute doit être entre :min et :max chiffres.',
    'dimensions' => 'le champ :attribute a des dimensions d\'image invalides.',
    'distinct' => 'le champ :attribute a une valeur en double.',
    'email' => 'le champ :attribute doit être une adresse e-mail valide.',
    'ends_with' => 'the :attribute must end with one of the following: :values.',
    'exists' => 'le champ sélectionnée :attribute est invalide.',
    'file' => 'le champ :attribute doit être un fichier.',
    'filled' => 'le champ :attribute doit avoir une valeur.',
    'gt' => [
        'numeric' => 'le champ :attribute doit être supérieur à :value.',
        'file' => 'le champ :attribute doit être supérieur à :value kilobytes.',
        'string' => 'le champ :attribute doit être supérieur à :value characters.',
        'array' => 'le champ :attribute doit avoir plus de :value items.',
    ],
    'gte' => [
        'numeric' => 'le champ :attribute doit être supérieur ou égal à :value.',
        'file' => 'le champ :attribute doit être supérieur ou égal à :value kilobytes.',
        'string' => 'le champ :attribute doit être supérieur ou égal à :value characters.',
        'array' => 'le champ :attribute doit avoir :value items ou plus.',
    ],
    'image' => 'le champ :attribute doit être une image.',
    'in' => 'the selected :attribute is invalid.',
    'in_array' => 'the :attribute n\'existe pas dans :other.',
    'integer' => 'the :attribute doit être un entier.',
    'ip' => 'the :attribute must be a valid IP address.',
    'ipv4' => 'the :attribute must be a valid IPv4 address.',
    'ipv6' => 'the :attribute must be a valid IPv6 address.',
    'json' => 'the :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'the :attribute must be less than :value.',
        'file' => 'the:attribute must be less than :value kilobytes.',
        'string' => 'the :attribute must be less than :value characters.',
        'array' => 'the :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'the :attribute must be less than or equal to :value.',
        'file' => 'the :attribute must be less than or equal to :value kilobytes.',
        'string' => 'the :attribute must be less than or equal to :value characters.',
        'array' => 'the :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'le champ :attribute ne doit pas être supérieur à :max.',
        'file' => 'le champ :attribute ne doit pas être supérieur à :max kilobytes.',
        'string' => 'le champ :attribute ne doit pas être supérieur à :max characters.',
        'array' => 'le champ :attribute ne doit pas avoir plus de :max items.',
    ],
    'mimes' => 'the :attribute must be a file of type: :values.',
    'mimetypes' => 'the :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'le champ :attribute doit être au moins :min.',
        'file' => 'le champ :attribute doit être au moins :min kilobytes.',
        'string' => 'le champ :attribute doit être au moins :min characters.',
        'array' => 'le champ :attribute doit avoir au moins :min items.',
    ],
    'multiple_of' => 'le champ :attribute must be a multiple of :value.',
    'not_in' => 'le champ selected :attribute is invalid.',
    'not_regex' => 'le champ :attribute format is invalid.',
    'numeric' => 'le champ :attribute doit être un nombre.',
    'password' => 'le champ mot de passe est incorrect.',
    'present' => 'le champ :attribute field must be present.',
    'prohibited' => 'le champ :attribute field is prohibited.',
    'prohibited_if' => 'le champ :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'le champ :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'the :attribute field prohibits :other from being present.',
    'regex' => 'le champ :attribute format n\'est pas valide.',
    'required' => 'le champ :attribute est obligatoire.',
    'required_if' => 'the :attribute field is required when :other is :value.',
    'required_unless' => 'the :attribute field is required unless :other is in :values.',
    'required_with' => 'the :attribute field is required when :values is present.',
    'required_with_all' => 'the :attribute field is required when :values are present.',
    'required_without' => 'the :attribute field is required when :values is not present.',
    'required_without_all' => 'the :attribute field is required when none of :values are present.',
    'same' => 'le champ :attribute et :other doit correspondre.',
    'size' => [
        'numeric' => 'le champ :attribute doit être :size.',
        'file' => 'le champ :attribute doit être :size kilobytes.',
        'string' => 'le champ :attribute doit être :size characters.',
        'array' => 'le champ :attribute doit contenir :size items.',
    ],
    'starts_with' => 'le champ :attribute doit commencer par following: :values.',
    'string' => 'le champ :attribute doit être une chaîne.',
    'timezone' => 'the :attribute must be a valid timezone.',
    'unique' => ' :attribute a déjà été pris.',
    'uploaded' => 'le champ :attribute failed to upload.',
    'url' => 'le champ :attribute must be a valid URL.',
    'uuid' => 'le champ :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
