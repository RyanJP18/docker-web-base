import pluginVue from 'eslint-plugin-vue';
import vueTsEslintConfig from '@vue/eslint-config-typescript';

export default [
    {
        name: 'app/files-to-lint',
        files: ['**/*.{ts,mts,tsx,vue}'],
    },

    {
        name: 'app/files-to-ignore',
        ignores: ['**/dist/**', '**/dist-ssr/**', '**/coverage/**', '**/public/**'],
    },

    ...pluginVue.configs['flat/essential'],
    ...vueTsEslintConfig(),

    {
        rules: {
            'no-console': 'error',
            'quotes': ['error', 'single', { 'avoidEscape': true }],
            'semi': ['error', 'always'],
            'max-len': ['warn', { 'code': 240, 'ignorePattern': 'd="([\\s\\S]*?)"' }],
            'vue/script-indent': ['warn', 4, { 'baseIndent': 0 }],
            'indent': ['warn', 4],
            'eqeqeq': ['error', 'smart'],
            'vue/html-indent': ['error', 4, {
                'attribute': 1,
                'baseIndent': 1,
                'closeBracket': 0,
                'alignAttributesVertically': true,
                'ignores': []
            }],
            'vue/max-attributes-per-line': ['error', {
                'singleline': {
                    'max': 4
                },      
                'multiline': {
                    'max': 1
                }
            }],
            'vue/first-attribute-linebreak': ['error', {
                'singleline': 'beside',
                'multiline': 'below'
            }],
            'vue/singleline-html-element-content-newline': 'off',
            '@typescript-eslint/no-explicit-any': 'error'
        }
    }
];
