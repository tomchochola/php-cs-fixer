<?php

declare(strict_types=1);

namespace Tomchochola\PhpCsFixer;

class Rules
{
    /**
     * Essential rules.
     *
     * @return array<string, bool>
     */
    public static function essential(): array
    {
        return [
            '@PSR12' => true,
            '@PSR12:risky' => true,
        ];
    }

    /**
     * Strict rules.
     *
     * @return array<string, bool|array<mixed>>
     */
    public static function strict(): array
    {
        return [
            '@Symfony' => true,
            '@Symfony:risky' => true,

            '@PHP81Migration' => true,
            '@PHP80Migration:risky' => true,

            // new
            'mb_str_functions' => true,
            'no_null_property_initialization' => true,
            'self_static_accessor' => true,
            'date_time_immutable' => true,
            'comment_to_phpdoc' => true,
            'multiline_comment_opening_closing' => true,
            'control_structure_continuation_position' => true,
            'no_superfluous_elseif' => true,
            'no_useless_else' => true,
            'date_time_create_from_format_call' => true,
            'nullable_type_declaration_for_default_null_value' => true,
            'regular_callable_call' => true,
            'static_lambda' => true,
            'global_namespace_import' => ['import_classes' => true, 'import_constants' => false, 'import_functions' => false],
            'combine_consecutive_issets' => true,
            'combine_consecutive_unsets' => true,
            'declare_parentheses' => true,
            'explicit_indirect_variable' => true,
            'no_unset_on_property' => true,
            'not_operator_with_successor_space' => true,
            'operator_linebreak' => ['only_booleans' => true],
            'php_unit_dedicate_assert' => true,
            'php_unit_dedicate_assert_internal_type' => true,
            'php_unit_expectation' => true,
            'php_unit_mock' => true,
            'php_unit_namespaced' => true,
            'php_unit_no_expectation_annotation' => true,
            'php_unit_strict' => true,
            'php_unit_test_case_static_method_calls' => true,
            'align_multiline_comment' => ['comment_type' => 'phpdocs_like'],
            'phpdoc_line_span' => true,
            'phpdoc_no_empty_return' => true,
            'phpdoc_order' => true,
            'phpdoc_tag_casing' => true,
            'phpdoc_var_annotation_correct_order' => true,
            'no_useless_return' => true,
            'return_assignment' => true,
            'simplified_null_return' => true,
            'multiline_whitespace_before_semicolons' => true,
            'strict_comparison' => true,
            'strict_param' => true,
            'escape_implicit_backslashes' => ['single_quoted' => true],
            'explicit_string_variable' => true,
            'heredoc_to_nowdoc' => true,
            'simple_to_complex_string_variable' => true,
            'array_indentation' => true,
            'method_chaining_indentation' => true,
            'general_phpdoc_annotation_remove' => ['annotations' => ['throws']],

            // migration override
            'random_api_migration' => ['replacements' => ['mt_rand' => 'random_int', 'rand' => 'random_int', 'getrandmax' => 'mt_getrandmax', 'srand' => 'mt_srand']],
            'trailing_comma_in_multiline' => ['after_heredoc' => true, 'elements' => ['arrays', 'arguments', 'parameters']],
            'use_arrow_functions' => false,

            // symfony
            'braces' => ['allow_single_line_anonymous_class_with_empty_body' => true],
            'class_attributes_separation' => ['elements' => ['method' => 'one', 'trait_import' => 'none', 'case' => 'none']],
            'ordered_class_elements' => [
                'order' => [
                    'use_trait',
                    'case',
                    'constant_public',
                    'constant_protected',
                    'constant_private',
                    'property_public_static',
                    'property_public',
                    'property_protected_static',
                    'property_protected',
                    'property_private_static',
                    'property_private',
                    'construct',
                    'destruct',
                    'magic',
                    'phpunit',
                    'method_public_static',
                    'method_public',
                    'method_protected_static',
                    'method_protected',
                    'method_private_static',
                    'method_private',
                ],
            ],
            'yoda_style' => ['equal' => false, 'identical' => false, 'less_and_greater' => false],
            'native_function_invocation' => ['include' => ['@internal'], 'scope' => 'all', 'strict' => true],
            'ordered_imports' => ['imports_order' => ['class', 'function', 'const'], 'sort_algorithm' => 'alpha'],
            'single_line_throw' => false,
            'php_unit_method_casing' => ['case' => 'snake_case'],
            'no_superfluous_phpdoc_tags' => true,
            'phpdoc_align' => ['align' => 'left'],
            'phpdoc_tag_type' => true,
            'single_quote' => ['strings_containing_single_quote_chars' => true],
            'blank_line_before_statement' => [
                'statements' => [
                    'break',
                    'continue',
                    'declare',
                    'phpdoc',
                    'do',
                    'exit',
                    'for',
                    'foreach',
                    'goto',
                    'if',
                    'return',
                    'switch',
                    'throw',
                    'try',
                    'while',
                    'yield',
                    'yield_from',
                ],
            ],
            'no_extra_blank_lines' => [
                'tokens' => [
                    'break',
                    'case',
                    'continue',
                    'curly_brace_block',
                    'default',
                    'extra',
                    'parenthesis_brace_block',
                    'return',
                    'square_brace_block',
                    'switch',
                    'use',
                    'use_trait',
                ],
            ],
        ];
    }
}
