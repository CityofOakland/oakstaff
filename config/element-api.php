<?php

use craft\elements\Entry;
use craft\helpers\UrlHelper;

$lastWeek = (new \DateTime('1 week ago'))->format(\DateTime::ATOM);

return [
    'endpoints' => [
        'staff.json' => function() {
            return [
                'elementType' => Entry::class,
                'criteria' => [
                  'section' => 'staff',
                  'status' => ['live', 'disabled'],
                  'dateUpdated' => '>= {$lastWeek}'
                ],
                'transformer' => function(Entry $entry) {
                    return [
                        'title' => $entry->title,
                        'status' => $entry->status,
                        'id' => $entry->staffId,
                        'email' => $entry->email,
                        'givenName' => $entry->givenName,
                        'middleName' => $entry->middleName,
                        'surname' => $entry->surname,
                        'phoneNumber' => $entry->phoneNumber,
                        'jobTitle' => $entry->jobTitle,
                        'department' => $entry->department,
                        'organization' => $entry->organization,
                        'staffSection' => $entry->staffSection
                    ];
                },
            ];
        },
    ]
];
