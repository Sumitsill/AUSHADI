// Define AYUSH system types and plant categories
const AYUSH_SYSTEMS = {
    AYURVEDA: 'ayurveda',
    YOGA: 'yoga',
    UNANI: 'unani',
    SIDDHA: 'siddha',
    HOMEOPATHY: 'homeopathy'
  };
  
  const PLANT_CATEGORIES = {
    HERB: 'herb',
    SHRUB: 'shrub',
    TREE: 'tree',
    CLIMBER: 'climber',
    AQUATIC: 'aquatic'
  };
  
  // Plant data
  const plants = [
    {
      id: '1',
      name: 'Tulsi',
      scientificName: 'Ocimum sanctum',
      description: 'Tulsi, also known as Holy Basil, is a sacred plant in Hindu belief. It is widely used in Ayurveda for its medicinal properties.',
      systems: [AYUSH_SYSTEMS.AYURVEDA, AYUSH_SYSTEMS.YOGA, AYUSH_SYSTEMS.HOMEOPATHY],
      category: PLANT_CATEGORIES.HERB,
      parts: ['Leaves', 'Seeds', 'Root'],
      uses: ['Respiratory disorders', 'Fever', 'Common cold', 'Stress relief'],
      properties: ['Adaptogenic', 'Antimicrobial', 'Anti-inflammatory'],
      imageUrl: 'images/tulsi.jpg',
      cultivation: 'Grows well in tropical and subtropical regions. Requires well-drained soil and regular watering.'
    },
    {
      id: '2',
      name: 'Ashwagandha',
      scientificName: 'Withania somnifera',
      description: 'Ashwagandha is one of the most important herbs in Ayurveda, used for a wide variety of conditions, particularly as a nerve tonic and adaptogen.',
      systems: [AYUSH_SYSTEMS.AYURVEDA, AYUSH_SYSTEMS.UNANI],
      category: PLANT_CATEGORIES.SHRUB,
      parts: ['Root', 'Leaves', 'Berries'],
      uses: ['Stress relief', 'Energy enhancement', 'Immune support'],
      properties: ['Adaptogenic', 'Anti-inflammatory', 'Antioxidant'],
      imageUrl: 'images/Ashwagandha.jpg',
      cultivation: 'Thrives in drier regions with sandy soils and full sun exposure.'
    },
    {
      id: '3',
      name: 'Neem',
      scientificName: 'Azadirachta indica',
      description: 'Neem is a fast-growing tree known for its medicinal properties. Every part of the tree has been used in traditional medicine for centuries.',
      systems: [AYUSH_SYSTEMS.AYURVEDA, AYUSH_SYSTEMS.UNANI, AYUSH_SYSTEMS.SIDDHA],
      category: PLANT_CATEGORIES.TREE,
      parts: ['Leaves', 'Bark', 'Seeds', 'Oil'],
      uses: ['Skin disorders', 'Dental care', 'Blood purification', 'Pest control'],
      properties: ['Antimicrobial', 'Anti-inflammatory', 'Antiparasitic'],
      imageUrl: 'images/Neem.jpg',
      habitat: 'Native to the Indian subcontinent and grows in tropical and semi-tropical regions.'
    },
    {
      id: '4',
      name: 'Brahmi',
      scientificName: 'Bacopa monnieri',
      description: 'Brahmi is a perennial, creeping herb native to the wetlands of India. It is a staple plant in Ayurvedic medicine, known for its cognitive-enhancing properties.',
      systems: [AYUSH_SYSTEMS.AYURVEDA, AYUSH_SYSTEMS.SIDDHA],
      category: PLANT_CATEGORIES.HERB,
      parts: ['Whole plant'],
      uses: ['Memory enhancement', 'Anxiety reduction', 'Epilepsy treatment'],
      properties: ['Adaptogenic', 'Nootropic', 'Anxiolytic'],
      imageUrl: 'images/brahmi.jpg',
      habitat: 'Grows in wet, damp and marshy areas throughout India, Nepal, Sri Lanka, and other tropical regions.'
    },
    {
      id: '5',
      name: 'Giloy',
      scientificName: 'Tinospora cordifolia',
      description: 'Giloy is a herbaceous vine of the family Menispermaceae. It is also known as Amrita or Guduchi in Sanskrit and is widely used in Ayurvedic medicine.',
      systems: [AYUSH_SYSTEMS.AYURVEDA, AYUSH_SYSTEMS.YOGA],
      category: PLANT_CATEGORIES.CLIMBER,
      parts: ['Stem', 'Root', 'Leaves'],
      uses: ['Immune boosting', 'Fever reduction', 'Diabetes management'],
      properties: ['Immunomodulatory', 'Anti-inflammatory', 'Antipyretic'],
      imageUrl: 'images/Giloy.jpg',
      cultivation: 'Grows well when supported by trees like neem or mango.'
    },
    {
      id: '6',
      name: 'Shatavari',
      scientificName: 'Asparagus racemosus',
      description: 'Shatavari is an important herb in Ayurvedic medicine, traditionally used to treat female reproductive issues and as a general tonic.',
      systems: [AYUSH_SYSTEMS.AYURVEDA, AYUSH_SYSTEMS.UNANI, AYUSH_SYSTEMS.SIDDHA],
      category: PLANT_CATEGORIES.CLIMBER,
      parts: ['Roots', 'Leaves'],
      uses: ['Women\'s health', 'Digestive aid', 'Immune support'],
      properties: ['Adaptogenic', 'Galactagogue', 'Demulcent'],
      imageUrl: 'images/Shatavari.jpg',
      cultivation: 'Grows well in tropical and subtropical climates with well-drained soil.'
    },
    {
      id: '7',
      name: 'Lotus',
      scientificName: 'Nelumbo nucifera',
      description: 'The sacred lotus is an aquatic plant with cultural and religious significance. All parts of the plant are used in traditional medicine.',
      systems: [AYUSH_SYSTEMS.AYURVEDA, AYUSH_SYSTEMS.UNANI, AYUSH_SYSTEMS.HOMEOPATHY],
      category: PLANT_CATEGORIES.AQUATIC,
      parts: ['Flowers', 'Seeds', 'Rhizomes', 'Leaves'],
      uses: ['Heart health', 'Digestive disorders', 'Skin conditions'],
      properties: ['Cooling', 'Astringent', 'Cardiotonic'],
      imageUrl: 'images/lotus.jpg',
      habitat: 'Grows in shallow, murky waters of ponds and lakes throughout Asia.'
    },
    {
      id: '8',
      name: 'Aloe Vera',
      scientificName: 'Aloe barbadensis miller',
      description: 'Aloe vera is a succulent plant species that is found only in cultivation. It has been used for centuries for its medicinal properties.',
      systems: [AYUSH_SYSTEMS.AYURVEDA, AYUSH_SYSTEMS.UNANI, AYUSH_SYSTEMS.HOMEOPATHY, AYUSH_SYSTEMS.YOGA],
      category: PLANT_CATEGORIES.SHRUB,
      parts: ['Gel', 'Latex'],
      uses: ['Skin conditions', 'Burns', 'Digestive health'],
      properties: ['Moisturizing', 'Anti-inflammatory', 'Antimicrobial'],
      imageUrl: 'images/aleo vera.jpg',
      cultivation: 'Thrives in dry conditions and requires minimal watering.'
    }
  ];
  
  // AYUSH systems data for UI
  const ayushSystemsData = [
    { id: AYUSH_SYSTEMS.AYURVEDA, name: 'Ayurveda', color: 'ayurveda' },
    { id: AYUSH_SYSTEMS.YOGA, name: 'Yoga & Naturopathy', color: 'yoga' },
    { id: AYUSH_SYSTEMS.SIDDHA, name: 'Siddha', color: 'siddha' },
    { id: AYUSH_SYSTEMS.HOMEOPATHY, name: 'Homeopathy', color: 'homeopathy' }
  ];
  
  // Plant categories data for UI
  const categoriesData = [
    { id: PLANT_CATEGORIES.HERB, name: 'Herbs' },
    { id: PLANT_CATEGORIES.SHRUB, name: 'Shrubs' },
    { id: PLANT_CATEGORIES.TREE, name: 'Trees' },
    { id: PLANT_CATEGORIES.CLIMBER, name: 'Climbers' },
    { id: PLANT_CATEGORIES.AQUATIC, name: 'Aquatic Plants' }
  ];