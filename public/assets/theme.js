// Fichier générer (antièrement par IA) selon nos maquettes

// Design tokens — Le Panier du coin (maquettes statiques)
// À charger APRÈS https://cdn.tailwindcss.com
tailwind.config = {
    theme: {
        extend: {
            colors: {
                cream: '#FAF6F0',
                paper: '#FFFDF9',
                ink: '#2B2622',
                terracotta: {
                    50: '#FBF1EC',
                    100: '#F6E2D8',
                    200: '#EDC5B4',
                    300: '#E1A189',
                    400: '#D27D61',
                    500: '#C2603B',
                    600: '#A8502F',
                    700: '#8A4126',
                    800: '#6E3420',
                    900: '#5A2C1C',
                },
                sage: {
                    50: '#F1F4EF',
                    100: '#E3EAE0',
                    200: '#C8D5C2',
                    300: '#A6BC9D',
                    400: '#819E76',
                    500: '#5C7357',
                    600: '#4A5D46',
                    700: '#3B4A38',
                    800: '#313D2F',
                    900: '#2A3428',
                },
            },
            fontFamily: {
                sans: ['"Instrument Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                display: ['"Bricolage Grotesque"', '"Instrument Sans"', 'ui-sans-serif', 'sans-serif'],
            },
            boxShadow: {
                soft: '0 1px 2px rgba(43, 38, 34, 0.04), 0 10px 30px -18px rgba(43, 38, 34, 0.35)',
                lift: '0 2px 4px rgba(43, 38, 34, 0.05), 0 18px 40px -20px rgba(43, 38, 34, 0.45)',
            },
        },
    },
};
